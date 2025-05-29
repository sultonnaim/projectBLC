document.addEventListener('DOMContentLoaded', function() {
    // Auto keep dropdown open for active menu group
    const activeMenuGroups = document.querySelectorAll('[x-data]');
    
    activeMenuGroups.forEach(group => {
      const dropdownItems = group.querySelectorAll('a');
      let shouldStayOpen = false;
      
      dropdownItems.forEach(item => {
        if (item.href === window.location.href || 
            item.classList.contains('active')) {
          shouldStayOpen = true;
        }
      });
      
      if (shouldStayOpen) {
        group.setAttribute('x-data', '{ open: true }');
      }
    });
    
    // Handle Turbolinks/Livewire navigation
    document.addEventListener('turbolinks:load', updateDropdownStates);
    document.addEventListener('livewire:load', updateDropdownStates);
    
    function updateDropdownStates() {
      document.querySelectorAll('[x-data]').forEach(group => {
        const hasActiveChild = group.querySelector('a.active');
        if (hasActiveChild) {
          group.__x.$data.open = true;
        }
      });
    }

        // Fungsi untuk mendapatkan salam berdasarkan waktu
    function getTimeBasedGreeting() {
        const hour = new Date().getHours();
        
        if (hour >= 5 && hour < 11) return 'Pagi';
        if (hour >= 11 && hour < 15) return 'Siang';
        if (hour >= 15 && hour < 19) return 'Sore';
        return 'Malam';
    }
    
    const greetingElement = document.getElementById('dynamic-greeting');
    if (greetingElement) {
        // Ganti 'Admin' dengan nama user yang login jika tersedia
        const userName = '{{ Auth::user()->name ?? "Admin" }}';
        greetingElement.textContent = `Selamat ${getTimeBasedGreeting()}, ${userName.split(' ')[0]}!`;
    }
  });