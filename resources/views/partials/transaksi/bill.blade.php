<div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="createBillLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%; width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBillLabel">Bill Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <form id="checkoutForm" action="{{ route('checkout.store') }}" method="POST"> --}}
            @csrf
            <div class="modal-body container-fluid">
                <div class="mb-3">
                    <table id="billTable" class="table">
                        <thead>
                            <tr>
                                <th style="padding: 6px 15px 15px 5px; text-align:left">Nama Barang</th>
                                <th style="padding: 6px 15px 15px 15px; text-align:left">Quantity</th>
                                <th style="padding: 6px 15px 15px 15px; text-align:left">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>               
                    <p style="padding-left:5px; font-weight: 600; font-size: 19px">Total Harga: <span style="color:rgb(52, 71, 103)">Rp.</span><span class="total-harga" style="color: rgb(52, 71, 103)">0</span></p>    
                    <label for="metodepembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-control" id="metodepembayaran" name="metodepembayaran" style="cursor: pointer">
                        <option value="debit">Debit</option>
                        <option value="cash">Cash</option>
                        <option value="qris">Qris</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary" id="checkoutBtn">Checkout</button>
            </div>
        {{-- </form> --}}
        </div>
    </div>
</div>
