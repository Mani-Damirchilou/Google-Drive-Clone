import './bootstrap';


window.addEventListener('alpine:init',() => {
    Alpine.store('darkMode',{
        on: Alpine.$persist(window.matchMedia('(prefers-color-scheme: dark)').matches),

        toggle(){
            this.on = !this.on;
        }
    })
})
