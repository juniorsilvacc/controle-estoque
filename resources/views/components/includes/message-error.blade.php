@if(session('error'))
<div class="error-message-container">
    <div class="alert alert-error" id="error-message">
        {{ session('error') }}
    </div>
</div>
@endif

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
    // Verifique se há uma mensagem de sucesso e exiba-a com animação.
    if (document.getElementById('error-message')) {
        document.getElementById('error-message').style.display = 'block';

        // Defina um temporizador para ocultar a mensagem após alguns segundos (por exemplo, 5 segundos).
        setTimeout(function() {
            document.getElementById('error-message').style.display = 'none';
        }, 3000); // 5000ms = 5 segundos
    }
});
</script>
