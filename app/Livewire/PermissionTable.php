<?php

namespace App\Livewire;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class PermissionTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('permissions');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('guard_name')
            ->add('created_at')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Name', 'name')
                ->headerAttribute(styleAttr: 'width: 80%;')
                ->sortable()
                ->searchable(),

            Column::action("Action")


        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    public function header(): array
    {
        return [
            Button::make('add', 'Tambah')
                ->bladeComponent('permission.add', ['modalId' => 'modal_1'])
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions($row): array
    {
         return [
            Button::make('edit')
                ->bladeComponent('permission.edit', ['modalId' => 'modal_edit_' .$row->id, 'rowId' => $row->id, 'title' => 'Edit Permission']),
            Button::make('delete')
                ->bladeComponent('permission.delete', ['modalId' => 'modal_delete_' . $row->id, 'rowId' => $row->id, 'title' => 'Hapus Permission']),
        ];
    }

/*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn() => Auth::user()->can('ubah role') === false)
                ->hide(),
            Rule::button('delete')
                ->when(fn() => Auth::user()->can('hapus ro                ->hide(),le') === false)

        ];
    }
    */

}
