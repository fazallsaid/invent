<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        // Riwayat Transaksi (All History)
        $transactions = Transaction::with(['user', 'product'])->latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function stockReport()
    {
        // Data Keluar Masuk (Stock Report)
        // Separate collections or just pass all and filter in view, but passing separate might be cleaner for tabs
        $transactionsIn = Transaction::with(['user', 'product'])
                            ->where('type', 'in')
                            ->latest()
                            ->paginate(10, ['*'], 'in_page'); // distinct pagination

        $transactionsOut = Transaction::with(['user', 'product'])
                            ->where('type', 'out')
                            ->latest()
                            ->paginate(10, ['*'], 'out_page');

        $products = Product::all(); // For the add modal

        return view('transactions.stock', compact('transactionsIn', 'transactionsOut', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            // Create Transaction
            Transaction::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'type' => $request->type,
                'quantity' => $request->quantity,
                'date' => $request->date,
                'notes' => $request->notes,
            ]);

            // Update Product Stock
            $product = Product::findOrFail($request->product_id);
            if ($request->type === 'in') {
                $product->increment('stock', $request->quantity);
            } else {
                if ($product->stock < $request->quantity) {
                    throw new \Exception('Stok tidak mencukupi untuk transaksi keluar ini.');
                }
                $product->decrement('stock', $request->quantity);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Transaksi berhasil disimpan dan stok diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
