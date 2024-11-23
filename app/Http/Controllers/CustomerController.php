<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customers = [
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '123-456-7890', 'address' => 'Malang'],
        ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '098-765-4321', 'address' => 'Surabaya'],
    ];

    public function index()
    {
        // Ambil data dari session jika tersedia, gunakan data default jika tidak
        $customers = session('customers', $this->customers);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // Validasi input termasuk kolom address
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Simulasikan penyimpanan data baru
        $customers = session('customers', $this->customers);

        $newCustomer = [
            'id' => count($customers) + 1,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];

        // Tambahkan customer baru ke session
        $customers[] = $newCustomer;
        session(['customers' => $customers]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }
}