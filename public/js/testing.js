console.log('Testing.js file loaded');
document.addEventListener('livewire:load', function () {
    console.log('Livewire loaded');
    Livewire.on('show-alert', function (data) {
        console.log('show-alert event triggered');
        alert(data.message);
    });
});
