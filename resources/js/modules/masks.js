document.addEventListener('DOMContentLoaded', () => {

    // CEP
    const zipCode = document.getElementById('zip_code');

    if (zipCode) {

        zipCode.addEventListener('input', (event) => {

            let value = event.target.value.replace(/\D/g, '');

            value = value.substring(0, 8);

            if (value.length > 5) {
                value = value.replace(/^(\d{5})(\d{1,3})$/, '$1-$2');
            }

            event.target.value = value;

        });

    }

    // Telefone
    const phone = document.getElementById('phone');

    if (phone) {

        phone.addEventListener('input', (event) => {

            let value = event.target.value.replace(/\D/g, '');

            value = value.substring(0, 11);

            if (value.length > 10) {

                value = value.replace(
                    /^(\d{2})(\d{5})(\d{0,4})$/,
                    '($1) $2-$3'
                );

            } else if (value.length > 6) {

                value = value.replace(
                    /^(\d{2})(\d{4})(\d{0,4})$/,
                    '($1) $2-$3'
                );

            } else if (value.length > 2) {

                value = value.replace(
                    /^(\d{2})(\d+)/,
                    '($1) $2'
                );

            }

            event.target.value = value;

        });

    }

});
