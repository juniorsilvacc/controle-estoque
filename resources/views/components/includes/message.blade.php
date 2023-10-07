@if(session('success'))
<div class="success-message-container">
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
</div>
@endif

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
    // Verifique se há uma mensagem de sucesso e exiba-a com animação.
    if (document.getElementById('success-message')) {
        document.getElementById('success-message').style.display = 'block';

        // Defina um temporizador para ocultar a mensagem após alguns segundos (por exemplo, 5 segundos).
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 3000); // 5000ms = 5 segundos
    }
});
</script>
