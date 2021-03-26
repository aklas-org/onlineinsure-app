<x-app-layout>
    <x-slot name="header">
        <x-page-header>Payroll PDF</x-page-header>
    </x-slot>

    <x-page-content>
        <div class="text-sm">
            <h3 class="text-xl font-bold text-center text-blue-800">Buyer
                Created Tax Invoice</h3>
            <div
                class="flex items-center justify-between bg-gray-300 font-bold text-base uppercase p-4 mt-8">
                <div>Adviser No: {{ $payroll->salesRep->id }}<span
                        class="ml-4">{{ $payroll->salesRep->name }}</span>
                </div>
                <div>{{ $payroll->period }}</div>
            </div>
            <div class="flex justify-between space-x-8 mt-8">
                <div class="flex-1 flex items-start space-x-2">
                    <div class="flex-shrink-0 font-bold underline">Produced on:
                    </div>
                    <div class="flex-grow-0">
                        <p>{{ $payroll->created_at->format('m/d/Y') }}</p>
                        <p>{{ $payroll->salesRep->name }}</p>
                        <p>{{ $payroll->salesRep->address }}</p>
                    </div>
                </div>
                <div class="flex-1 text-center">
                    <p class="font-bold underline">Produced by:</p>
                    <p class="mt-1">{{ config('services.company.name') }}</p>
                    <p>{{ config('services.company.address') }}</p>
                    <p>{{ config('services.company.contact_number') }}</p>
                    <p>{{ config('services.company.website') }}</p>
                </div>
                <div class="flex-1 flex justify-end">
                    <table class="table-auto">
                        <tbody>
                            <tr>
                                <th class="font-bold text-left pr-2">Statement
                                    Week:</th>
                                <td>{{ $payroll->period_start->format('Ym') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="font-bold text-left pr-2">Statement
                                    Date:</th>
                                <td>{{ $payroll->period_end->format('m/d/Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="font-bold text-left pr-2">PID:</th>
                                <td>{{ $payroll->id }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <p class="font-bold text-base mt-8">Buyer Created Tax Invoice</p>
            <table class="table-auto w-full mt-8">
                <thead>
                    <tr class="bg-gray-300">
                        <th
                            class="font-bold text-center p-2 border border-gray-900">
                            Date</th>
                        <th
                            class="font-bold text-center p-2 border border-gray-900">
                            Description</th>
                        <th
                            class="font-bold text-center p-2 border border-gray-900">
                            Debit</th>
                        <th
                            class="font-bold text-center p-2 border border-gray-900">
                            Credit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center p-2 border border-gray-900">
                            {{ $payroll->created_at->format('m/d/Y') }}</td>
                        <td class="p-2 border border-gray-900">Commissions</td>
                        <td class="p-2 border border-gray-900">&nbsp;</td>
                        <td class="text-right p-2 border border-gray-900">
                            ${{ currency($payroll->commission) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 border border-gray-900">
                            {{ $payroll->created_at->format('m/d/Y') }}</td>
                        <td class="p-2 border border-gray-900">Bonuses</td>
                        <td class="p-2 border border-gray-900">&nbsp;</td>
                        <td class="text-right p-2 border border-gray-900">
                            ${{ currency($payroll->bonus) }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-gray-900"></td>
                        <td class="p-2 border border-gray-900"></td>
                        <td class="text-right p-2 border border-gray-900">
                            ${{ number_format(0, 2) }}</td>
                        <td class="text-right p-2 border border-gray-900">
                            ${{ currency($payroll->credit_total) }}</td>
                    </tr>
                    <tr>
                        <td class="text-right font-bold p-2">&nbsp;</td>
                        <td class="text-right font-bold p-2">Totals</td>
                        <td class="text-right font-bold p-2">
                            ${{ number_format(0, 2) }}</td>
                        <td class="text-right font-bold p-2">Net
                            ${{ currency($payroll->sales_rep_commission) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-end">
                <table class="table-auto">
                    <tr>
                        <th class="font-bold p-2">Withholding Tax</th>
                        <td class="text-right font-bold p-2">
                            ${{ currency($payroll->sales_rep_tax) }}</td>
                    </tr>
                    <tr>
                        <th class="font-bold p-2">Payment Amount</th>
                        <td class="text-right font-bold text-red-700 p-2">
                            ${{ currency($payroll->sales_rep_payment_amount) }}
                        </td>
                    </tr>
                </table>
            </div>

            <h3 class="text-xl font-bold text-center text-blue-800 mt-8"
                style="page-break-before:always !important">Detail
                Commission Statement</h3>
            <div
                class="flex items-center justify-between bg-gray-300 font-bold text-base uppercase p-4 mt-8">
                <div>Adviser No: {{ $payroll->salesRep->id }}<span
                        class="ml-4">{{ $payroll->salesRep->name }}</span>
                </div>
                <div>{{ $payroll->period }}</div>
            </div>
            <div class="bg-gray-300 font-bold text-base p-4 mt-4">
                Production
            </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="font-bold underline p-2">Client Name</th>
                        <th class="font-bold underline p-2">Annual Premium</th>
                        <th class="font-bold underline p-2">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payroll->clients as $client)
                        <tr>
                            <td class="text-center p-2">{{ $client->name }}
                            </td>
                            <td class="text-center p-2">
                                ${{ currency($client->annual_premium) }}</td>
                            <td class="text-center p-2">
                                ${{ currency($client->annual_premium - $payroll->commission) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center font-bold p-2">Total</th>
                        <th class="text-center font-bold p-2">
                            ${{ currency($payroll->clients()->sum('annual_premium')) }}
                        </th>
                        <th class="text-center font-bold p-2">
                            ${{ currency($payroll->clients()->sum('annual_premium') - $payroll->commission * $payroll->clients()->count()) }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </x-page-content>
</x-app-layout>
