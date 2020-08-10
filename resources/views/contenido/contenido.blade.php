    @extends('principal')
    @section('contenido')

            <template v-if="menu==0">
                <dashboard></dashboard>
            </template>

            <template v-if="menu==1">
                <categoria></categoria>
            </template>

            <template v-if="menu==2">
                <articulo></articulo>
            </template>

            <template v-if="menu==3">
                <bodega></bodega>
            </template>

            <template v-if="menu==4">
                <venta></venta>
            </template>

            <template v-if="menu==5">
                <cliente></cliente>
            </template>

            <template v-if="menu==6">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==7">
                <h1>Acerca De</h1>
            </template>


        
@endsection