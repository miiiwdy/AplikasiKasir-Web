<div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="createBillLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%; width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBillLabel">Bill Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="checkoutForm" action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="modal-body container-fluid">
                <div class="mb-3">
                    <table id="billTable">
                        <thead>
                            <tr>
                                <th>
                                    <label for="itemname">Nama Barang</label>
                                </th>
                                <th><label for="quantity">Quantity</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <label for="metodepembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-control" id="metodepembayaran" name="metodepembayaran">
                        <option value="debit">Kartu Debit</option>
                        <option value="cash">Cash</option>
                        <option value="qris">Qris</option>
                        </select>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary">Checkout</button>
            </div>
        </form>
        </div>
    </div>
</div>
