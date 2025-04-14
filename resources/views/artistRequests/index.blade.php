<x-app-layout>
    <x-table
    :headers="['Acciones','Usuario', 'Nombre artistico', 'Correo profesional','Creado', 'Ultima actualización']"
    :fields="['user_id', 'stage_name', 'professional_email', 'created_at' ,'update_at']"
    :items="$artistRequests"
    :type="['artistRequests']"
    :actions="['show', 'delete']"
    />
</x-app-layout>