<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

final class CategoryTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
       // $this->showCheckBox();

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
        return Category::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name');
    }

    public function columns(): array
    {
        return [


            Column::make('Name', 'name')
                ->sortable()
                ->searchable()
                ->headerAttribute(styleAttr: 'width: 85%'),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }


    public function actions($row): array
    {
        return [
            Button::make('edit')
                ->bladeComponent('category.edit', ['modalId' => 'modal_edit_' . $row->id , 'rowId' => $row->id, 'title' => 'Edit Kategori']),
            Button::make('delete')
                ->bladeComponent('category.delete', ['modalId' => 'modal_delete_' . $row->id, 'rowId' => $row->id, 'title' => 'Hapus Kategori']),
        ];
    }

    public function header(): array
    {
        return [
            Button::make('add', 'Tambah')
                ->bladeComponent('category.tambah', ['modalId' => 'modal_1'])
        ];
    }



    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn() => auth()->user()->can('edit kategori') === false)
                ->hide(),
                Rule::button('delete')
                ->when(fn() => auth()->user()->can('hapus kategori') === false)
                ->hide(),
        ];
    }

}
