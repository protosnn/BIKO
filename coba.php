<!DOCTYPE html>
<html>
<head>
    <title>Radio dengan Input Sendiri</title>
    <script>
        function toggleInput() {
            var customRadio = document.getElementById('custom');
            var customInput = document.getElementById('customInput');
            customInput.disabled = !customRadio.checked;
            if (!customRadio.checked) {
                customInput.value = '';
            }
        }
    </script>
</head>
<body>
    <form>
        <label>
            <input type="radio" name="option" value="Pilihan 1" onclick="toggleInput()">
            Pilihan 1
        </label><br>
        <label>
            <input type="radio" name="option" value="Pilihan 2" onclick="toggleInput()">
            Pilihan 2
        </label><br>
        <label>
            <input type="radio" name="option" value="custom" id="custom" onclick="toggleInput()">
            Lainnya:
            <input type="text" name="customInput" id="customInput" disabled>
        </label>
    </form>
</body>
</html>