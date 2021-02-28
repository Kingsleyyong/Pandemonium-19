const countEl = document.getElementById('count');

updateCount();

function updateCount() {
    fetch('https://api.countapi.xyz/update/florin-popcom/codepen/?amount=1')
        .then(res => res.json())
        .then(res => {
            countEl.innerHTML = res.value;
        })
}

