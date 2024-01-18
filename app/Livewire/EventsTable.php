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
use App\Models\Events;

class EventsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $newModel = new Events();
        return $table
            ->query(Events::query())
            ->columns([
                TextColumn::make("entity_id")
                ->label($newModel->getAttributeLabel("entity_id"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("venue_id")
                ->label($newModel->getAttributeLabel("venue_id"))
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
            TextColumn::make("description")
                ->label($newModel->getAttributeLabel("description"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("scheduled_start")
                ->label($newModel->getAttributeLabel("scheduled_start"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("scheduled_end")
                ->label($newModel->getAttributeLabel("scheduled_end"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("start_date")
                ->label($newModel->getAttributeLabel("start_date"))
                ->dateTime()
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("end_date")
                ->label($newModel->getAttributeLabel("end_date"))
                ->dateTime()
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("registration_note")
                ->label($newModel->getAttributeLabel("registration_note"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("pre-approval")
                ->label($newModel->getAttributeLabel("pre-approval"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("max_capacity")
                ->label($newModel->getAttributeLabel("max_capacity"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("type")
                ->label($newModel->getAttributeLabel("type"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("status")
                ->label($newModel->getAttributeLabel("status"))
                ->formatStateUsing(fn (Events $record): string => $record->statusLabel)
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
                ->url(fn (Events $record): string => route('events.edit', ['events' => $record]))
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
                fn (Model $record): string => route('events.show', ['events' => $record]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->defaultPaginationPageOption(25);
    }

    public function render() : View
    {
        return view('events.table');
    }
}