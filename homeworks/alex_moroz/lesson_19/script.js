function maskCreditCard() {
    let vcc = this.value.replace(/\D/g, '');
    this.value = '';
    for (let i = 0; i < vcc.length; i++) {
        this.value += (i % 4 === 0 && i !== 0 ? ' ' : '') + vcc[i];
    }
}
document.getElementById('cardNumber').addEventListener('input', maskCreditCard, false);
function fillCardHolder() {
    document.getElementById('cardHolder').value = document.getElementById('cardHolders').value;
}