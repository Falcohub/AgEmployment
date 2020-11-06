const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

//-------------- VALIDAR CAMPOS VACIOS ---------------
/*let InputID = document.getElementById("TxtDocumento")
let botonEnvio = document.getElementById("Registrarse")
let aviso = document.getElementById("aviso")

class Formulario {
    constructor(InputID, botonEnvio) {
        this.InputID = InputID
        this.botonEnvio = botonEnvio
    }

                        validaElementos() {
                            this.botonEnvio.addEventListener("click", (event) => {
                                event.preventDefault();
                                (this.InputID.value.trim() === "") ?
                                aviso.innerHTML = `El documento es un campo requerido`: aviso.innerHTML = `Formulario procesado con ${this.InputID.value}`
                            })
                        }
                    }

                    let formularioValidadoUno = new Formulario(InputID, botonEnvio)
                    formularioValidadoUno.validaElementos()*/