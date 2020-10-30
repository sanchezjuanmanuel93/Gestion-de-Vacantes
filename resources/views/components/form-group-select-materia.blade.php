<x-form-group-select fieldName="id-materia" fieldId="id-materia" fieldDescription="Materias" :errors="$errors"
    :collection="$materias" keyField="id" valueField="nombre" searchOn="true" placeholder="Ingrese materia a buscar"
    :selected="$selected" />