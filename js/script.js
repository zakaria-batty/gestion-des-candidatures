function Evnt(X) {
    if (X == 'poste') {
        document.getElementById('poste').style.display = 'block';
        document.getElementById('profile').style.display = 'none';
    } else if (X == 'profile') {
        document.getElementById('poste').style.display = 'none';
        document.getElementById('profile').style.display = 'block';
    } else {
    }
    return
}
