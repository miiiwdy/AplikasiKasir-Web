let purchaseData = [];

function addToPurchaseData(item) {
    let existingItem = purchaseData.find(data => data.kode_barang === item.kode_barang);
    if (existingItem) {
        existingItem.quantity += item.quantity;
    } else {
        purchaseData.push(item);
    }
    updateBillDetails();
}

function updateBillDetails() {
    let billDetails = document.getElementById('billDetails');
    billDetails.innerHTML = '';

    purchaseData.forEach(item => {
        billDetails.innerHTML += `
            <p>Nama Barang: ${item.nama_barang}, Kode Barang: ${item.kode_barang}, Quantity: ${item.quantity}</p>
        `;
    });
}

document.getElementById('checkoutForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('purchaseData').value = JSON.stringify(purchaseData);
    this.submit();
});

function updateQuantity(action, itemKode) {
    let item = purchaseData.find(data => data.kode_barang === itemKode);
    if (item) {
        if (action === 'tambah') {
            item.quantity += 1;
        } else if (action === 'kurang') {
            if (item.quantity > 1) {
                item.quantity -= 1;
            } else {
                purchaseData = purchaseData.filter(data => data.kode_barang !== itemKode);
                updateBillDetails();
            }
        }
        updateBillDetails();
    }
}

document.querySelectorAll('.tambahbarang').forEach(button => {
    button.addEventListener('click', () => updateQuantity('tambah', button.dataset.kode));
});
document.querySelectorAll('.kurangbarang').forEach(button => {
    button.addEventListener('click', () => updateQuantity('kurang', button.dataset.kode));
});
