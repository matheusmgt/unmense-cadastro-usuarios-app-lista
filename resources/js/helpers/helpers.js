import axios from 'axios'
import Swal from 'sweetalert2'
import { isProxy, toRaw } from 'vue';

export const methods = {

    async sendRequestAPI(method, route, data = {}, type = 'application/json', redirectAuto = true, toastNotify = true) {

        if (isProxy(data)){
            data = toRaw(data)
        }

        try {
            return await axios.request({
                method: method,
                url: route,
                data: data,
                headers: {
                    "Content-Type": type,
                    Authorization: `Bearer ${localStorage.getItem('key')}`
                }
            })
        } catch (err) {
            if(redirectAuto) window.location = '#/login'
            if(toastNotify) this.ToastrError('Atenção! Faça login para utilizar o sistema.')
        }
    },

    async logout() {
        await this.sendRequestAPI('GET', '/api/logout')
        window.location = '#/login'
    },

    confirmSwal(title, text, icon, funcAccept = '', funcDenied = '') {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: "green",
            cancelButtonColor: "red",
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar"
        }).then((ok) => {
            ok = ok.isConfirmed
            if (ok) {
                funcAccept.length > 1 ? funcAccept[0](funcAccept[1]) : funcAccept[0]()
            } else if (!ok && funcDenied) {
                funcDenied.length > 1 ? funcDenied[0](funcDenied[1]) : funcDenied[0]()
            }
        });
    },

    getLangError(error) {
        switch (error.$validator) {
            case 'required':
                return 'Este campo é obrigatório';
            case 'email':
                return 'Este email não é valido.';
        }
    },

    ToastrSuccess(mensagem) {
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire({
            icon: "success",
            title: mensagem
        });
    },

    ToastrError(mensagem) {
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire({
            icon: "error",
            title: mensagem
        });
    }

}