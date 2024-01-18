<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use App\Models\Venue;

class VenuesTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $newModel = new Venue();
        return $table
            ->query(Venue::query())
            ->columns([
                TextColumn::make("entity_id")
                ->label($newModel->getAttributeLabel("entity_id"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("name")
                ->label($newModel->getAttributeLabel("name"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("slug")
                ->label($newModel->getAttributeLabel("slug"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("address")
                ->label($newModel->getAttributeLabel("address"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("location")
                ->label($newModel->getAttributeLabel("location"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("country")
                ->label($newModel->getAttributeLabel("country"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("postcode")
                ->label($newModel->getAttributeLabel("postcode"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("latitude")
                ->label($newModel->getAttributeLabel("latitude"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("longitude")
                ->label($newModel->getAttributeLabel("longitude"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("email")
                ->label($newModel->getAttributeLabel("email"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("phone")
                ->label($newModel->getAttributeLabel("phone"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("mobile")
                ->label($newModel->getAttributeLabel("mobile"))
                ->sortable()
                ->toggleable()
                ->searchable(),
                TextColumn::make('created_at')
                    ->label($newModel->getAttributeLabel('created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label($newModel->getAttributeLabel('updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                //TextColumn::make('id'),
                //TextColumn::make('name')->sortable()->searchable()->toggleable(),
                //TextColumn::make('body')->description(fn (Demo $model): string => $model->statusLabel),
                //TextColumn::make('body')->searchable(isIndividual: true, isGlobal: true)->toggleable(),
                //TextColumn::make('status')->formatStateUsing(fn (Demo $model): string => $model->statusLabel)->searchable(isIndividual: true, isGlobal: false)->toggleable(),
                //TextColumn::make('created_at')->dateTime()->toggleable()->searchable(isIndividual: true, isGlobal: false),

                /*SelectColumn::make('status')
                ->searchable(isIndividual: true, isGlobal: true)
                ->options(Demo::getStatusArray()),*/
            ])
            ->filters([
                /*Filter::make('statusActive')
                ->label($newModel->getAttributeLabel('status'))
                ->query(fn (Builder $query): Builder => $query->where('status', Demo::STATUS_ACTIVE))
                ->label('Estado ativo')
                ->toggle(),
                SelectFilter::make('status')
                ->label($newModel->getAttributeLabel('status'))
                ->multiple()
                ->options(Demo::getStatusArray())*/
            ])
            ->actions([
                Action::make('edit')
                ->label(__('Update'))
                ->url(fn (Venue $record): string => route('venues.edit', ['venue' => $record]))
                ->icon('heroicon-o-pencil')
                //->color('danger')
            ])
            ->bulkActions([
                //BulkActionGroup::make([
                BulkAction::make('delete')
                ->requiresConfirmation()
                ->action(fn (Collection $records) => $records->each->delete())
                //]),
            ])
            ->defaultSort('id', 'desc')
            ->recordUrl(
                fn (Model $record): string => route('venues.show', ['venue' => $record]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->defaultPaginationPageOption(25);
    }

    public function render() : View
    {
        return view('venues.table');
    }
}