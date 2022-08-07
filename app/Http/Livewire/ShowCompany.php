<?php

namespace App\Http\Livewire;

use Filament\Tables;
use App\Models\Company;
use Livewire\Component;
use Filament\Tables\Filters\Filter;
use Illuminate\Contracts\View\View;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;


class ShowCompany extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $categories;

    protected function getTableQuery(): Builder
    {
        return Company::query();
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('Seller')->query(fn (Builder $query): Builder => $query->where('type','seller')),
            Filter::make('Buyer')->query(fn (Builder $query): Builder => $query->where('type','buyer'))
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('type')->label('Type')->sortable()->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
           
        ];
    }

    public function render(): View
    {
        return view('livewire.show-company');
    }
}
