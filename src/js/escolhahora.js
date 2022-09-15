function changeSelected(active) {
    Array.from(document.querySelectorAll('.escolhahora')).forEach(element => {
        if (element.classList.contains('btn-primary')) {
            
            element.classList.remove('btn-primary')
            element.classList.add('btn-outline-primary')
        }
    })

    active.classList.remove('btn-outline-primary')
    active.classList.add('btn-primary')
}