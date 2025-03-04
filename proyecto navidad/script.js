document.getElementById('cerebroOn').addEventListener('click', () => {
    fetch('./logic.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'activarCerebro' })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Funciones ejecutadas correctamente.');
        } else {
            alert('Error al ejecutar las funciones.');
        }
    })
    .catch(error => console.error('Error:', error));
});

document.getElementById('Xmen').addEventListener('click', () => {
    fetch('./logic.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'crearXmen' }) // Especificamos la acción
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('¡X-Men creados exitosamente!');
        } else {
            alert('Error al crear X-Men: ' + (data.error || 'Desconocido'));
        }
    })
    .catch(error => console.error('Error:', error));
});