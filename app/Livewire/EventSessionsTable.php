<?php

namespace App\Livewire;

use App\Models\Entity;
use App\Models\Event;
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
use App\Models\EventSession;

class EventSessionsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $newModel = new EventSession();
        $entityId = auth()->user()->entities->first()->id;

        return $table
            ->query(EventSession::query()->with('event'))
            ->columns([
                TextColumn::make("event.entity.name")
                ->label(Entity::getAttributeLabelStatic("Entity"))
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
            TextColumn::make("max_capacity")
                ->label($newModel->getAttributeLabel("max_capacity"))
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
            //TextColumn::make("rrule")
            //    ->label($newModel->getAttributeLabel("rrule"))
            //    ->sortable()
            //    ->toggleable()
            //    ->searchable(),
            TextColumn::make("type")
                ->label($newModel->getAttributeLabel("type"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            //TextColumn::make("status")
            //    ->label($newModel->getAttributeLabel("status"))
            //    ->formatStateUsing(fn (EventSession $record): string => $record->statusLabel)
            //    ->sortable()
            //    ->toggleable()
            //    ->searchable(),
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

                // Filters all the data to show only data associated with the logged user (using their entities)
                SelectFilter::make('entity_id')
                    ->label('Entity')
                    ->query(fn (Builder $query): Builder => $query->whereHas('event', function (Builder $query) use ($entityId) {
                        $query->where('entity_id', $entityId);
                    }))
                    ->options(Entity::pluck('name', 'id')->all()),
            ])
            //->actions([
            //    Action::make('edit')
            //    ->label(__('Update'))
            //    ->url(fn (EventSession $record): string => route('event-sessions.edit', ['event_session' => $record->slug]))
            //    ->icon('heroicon-o-pencil')
            //    //->color('danger')
            //])
            //->bulkActions([
            //    //BulkActionGroup::make([
            //    BulkAction::make(__('delete'))
            //    ->requiresConfirmation()
            //    ->action(fn (Collection $records) => $records->each->delete())
            //    //]),
            //])
            ->defaultSort('id', 'desc')
            ->recordUrl(
                fn (Model $record): string => route('event-sessions.show', ['event_session' => $record->slug]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->defaultPaginationPageOption(25);
    }

    public function render() : View
    {
        return view('event_sessions.table');
    }
}
