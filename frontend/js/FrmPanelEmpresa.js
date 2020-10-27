const tags = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorall('[data-tab-content]')

tabs.forEach(tab => {
    tab.addEventListener ('click', () => {
        const target = document.querySelector(tab.dataset.tabtarget)
        tabContents.forEach(tab => tabContents.classList.remove('active'))
        target.classList.add('active')

    })
})