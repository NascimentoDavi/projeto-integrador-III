<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\BankAccountType;

class BankAccountController extends Controller
{
    // Dependencie Injection
    protected $bankAccountService;
    public function __construct(BankAccountService $bankAccountService)
    {
        $this->bankAccountService = $bankAccountService;
    }

    // Criação de conta bancária
    public function createBankAccount(Request $request)
    {
        // Validar dados enviados pela request
        $validated = $request->validate([
            'account_number' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_inst_id' => 'required|exists:bank_inst_id',
            'account_type' => 'required|in:'.implode(',', \App\Enums\BankAccountType::values()),
            'initial_balance' => 'nullable|numeric|min:0',
        ]);

        
    }
}
