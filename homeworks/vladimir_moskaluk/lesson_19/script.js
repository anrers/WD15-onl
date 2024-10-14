const cardMask = document.getElementById('card-number');

IMask(
    cardMask,
    {mask: '0000 0000 0000 0000'}
)

const expiryDataMask = document.getElementById('expiry-date');

IMask(
    expiryDataMask,
    {mask: '00/00'}
)

const zipCodeMask = document.getElementById('zip');

IMask(
    zipCodeMask,
    {mask: '000000'}
)

