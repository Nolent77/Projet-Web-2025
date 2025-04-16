document.getElementById('create-student-form').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const response = await fetch(this.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
        },
        body: formData,
    });

    const data = await response.json();

    if (response.ok) {
        document.getElementById('success-message').classList.remove('hidden');
        this.reset();

        // Ajouter l'étudiant au tableau sans recharger la page
        const tbody = document.querySelector('table tbody');
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${data.user.last_name}</td>
            <td>${data.user.first_name}</td>
            <td>${new Date(data.user.birth_date).toLocaleDateString('fr-FR')}</td>
            <td>
                <div class="flex items-center justify-between">
                    <a href="#"><i class="text-success ki-filled ki-shield-tick"></i></a>
                    <a class="hover:text-primary cursor-pointer" href="#" data-modal-toggle="#student-modal">
                        <i class="ki-filled ki-cursor"></i>
                    </a>
                </div>
            </td>
        `;
        tbody.appendChild(tr);
    } else {
        alert('Erreur lors de l’ajout');
    }
});
