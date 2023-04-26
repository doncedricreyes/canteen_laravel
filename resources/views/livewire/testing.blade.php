<div>
{{$puta}}
<button wire:click="showAlert">Show Alert</button>
</div>

<script>

console.log('Testing.js file loaded');
document.addEventListener('livewire:load', function () {
    console.log('Livewire loaded');
  Livewire.on('putangina', function (data) {
    console.log('testing')
    alert(data.message);
});
});
 </script>
