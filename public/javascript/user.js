function sendLoginForm(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email == '' || password == '') {
        alert('Todos os campos devem ser preenchidos! Verifique os dados e tente novamente.')
        return;
    }

    $.ajax({
		type: 'POST',
		url: '/entrar',
		data: {
            'email': email,
            'password': password
        },
		success: function(data) {			
            if (data) {
                window.location.href = '/principal';
                return;
            }

            alert('E-mail e/ou senha incorreta(s)! Verifique os dados e tente novamente.')
		}
	});
}

function updateUser(id) {
    $.ajax({
		type: 'GET',
		url: '/usuario',
		data: {
            'id': id
        },
        success: function(data) {			
            window.location.href = '/usuario';
		}
	});
}

function sendUserForm(event) {
    event.preventDefault();

    const operation = document.getElementById('operation').value;
    const id = document.getElementById('id').value;
    const user_type_id = document.getElementById('user_type_id').value;
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    console.log(user_type_id);

    if (operation == 'Cadastrar') {
        if (name == '' || user_type_id == 0 || email == '') {
            alert('Todos os devem ser preenchidos! Verifique os dados e tente novamente.')
            return;
        }
    }
    else {
        if (name == '' || user_type_id == 0 || email == '') {
            alert('Os campos \'Nome\', \'Tipo de usuário\' e \'E-mail\' devem ser preenchidos! Verifique os dados e tente novamente.')
            return;
        }
    }

    const type = (operation == 'Cadastrar') ? 'POST' : 'PUT'

    $.ajax({
		type: type,
		url: '/usuario',
		data: {
            'id': id,
            'user_type_id': user_type_id,
            'name': name,
            'email': email,
            'password': password
        },
		success: function(data) {
            if (data) {
                window.location.href = '/usuarios';
                return;
            }

            alert('E-mail já utilizado! Verifique os dados e tente novamente.')
		}
	});
}

function deleteUser(id) {
    $.ajax({
		type: 'DELETE',
		url: '/usuario',
		data: {
            'id': id
        },
		success: function(data) {
            if (data) {
                window.location.href = '/usuarios';
                return;
            }
		}
	});
}