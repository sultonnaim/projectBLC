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
  });