function formatarTelefone(inputId) {
    var input = document.getElementById(inputId);
    if (input) {
        input.addEventListener("input", function () {
            var telefone = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

            if (telefone.length === 11) {
                telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                this.value = telefone; // Atualiza o valor do input formatado
            }
        });
    }
}

function formatarCnpj(inputId) {
    var input = document.getElementById(inputId);
    if (input) {
        input.addEventListener("input", function () {
            var cnpj = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

            if (cnpj.length === 14) {
                cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
                this.value = cnpj; // Atualiza o valor do input formatado
            }
        });
    }
}

function formatarCampoPreco(inputId) {
    var input = document.getElementById(inputId);

    var numberFormat = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });

    input.addEventListener("input", function() {
        this.value = formatPrice(this.value);
    });

    function formatPrice(value) {
        // Remove caracteres não numéricos
        var numericValue = parseFloat(value.replace(/\D/g, '')) / 100;
        return numberFormat.format(numericValue);
    }
}
