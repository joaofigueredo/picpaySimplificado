
                document.getElementById('opcoes').addEventListener('change', function() {
                    var cpfField = document.getElementById('cpf');
                    if (this.value == '1' || this.value == '0') {
                        cpfField.disabled = true;
                        cpfField.value = '';
                    }
                    if (this.value == '2') {
                        cpfField.disabled = false;
                    }
                });
