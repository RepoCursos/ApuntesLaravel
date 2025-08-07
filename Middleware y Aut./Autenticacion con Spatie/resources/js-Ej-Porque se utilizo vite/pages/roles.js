// Espera a que todo el HTML esté cargado antes de ejecutar el script.
// Esto previene errores si el script se carga antes que los elementos del DOM.
document.addEventListener('DOMContentLoaded', () => {

    // Función para manejar los modales (añadir rol, añadir permiso)
    const initModalHandling = () => {
        // Helper para abrir y cerrar modales
        const setupModal = (modalId, openBtnId, closeBtnIds) => {
            const modal = document.getElementById(modalId);
            const openBtn = document.getElementById(openBtnId);

            // Si los elementos principales no existen, no hacer nada
            if (!modal || !openBtn) return;

            const openModal = () => modal.classList.remove('hidden');
            const closeModal = () => modal.classList.add('hidden');

            openBtn.addEventListener('click', openModal);

            closeBtnIds.forEach(id => {
                const closeBtn = document.getElementById(id);
                if (closeBtn) {
                    closeBtn.addEventListener('click', closeModal);
                }
            });
        };

        // Configurar modal de Roles
        setupModal('addRoleModal', 'addRoleBtn', ['closeRoleModal', 'cancelRoleBtn']);

        // Configurar modal de Permisos
        setupModal('addPermissionModal', 'addPermissionBtn', ['closePermissionModal', 'cancelPermissionBtn']);
    };

    // Inicializar todas las funcionalidades de la página
    initModalHandling();
});