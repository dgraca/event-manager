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
use App\Models\AccessTicket;

class AccessTicketsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $newModel = new AccessTicket();
        return $table
            ->query(AccessTicket::query())
            ->columns([
                TextColumn::make("event_session_ticket_id")
                ->label($newModel->getAttributeLabel("event_session_ticket_id"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("user_id")
                ->label($newModel->getAttributeLabel("user_id"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("payment_option_id")
                ->label($newModel->getAttributeLabel("payment_option_id"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("code")
                ->label($newModel->getAttributeLabel("code"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("name")
                ->label($newModel->getAttributeLabel("name"))
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
            TextColumn::make("description")
                ->label($newModel->getAttributeLabel("description"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("tickets_count")
                ->label($newModel->getAttributeLabel("tickets_count"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("approved")
                ->label($newModel->getAttributeLabel("approved"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("status")
                ->label($newModel->getAttributeLabel("status"))
                ->formatStateUsing(fn (AccessTicket $record): string => $record->statusLabel)
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
                ->url(fn (AccessTicket $record): string => route('access-tickets.edit', ['access_tickets' => $record]))
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
                fn (Model $record): string => route('access-tickets.show', ['access_tickets' => $record]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->defaultPaginationPageOption(25);
    }

    public function render() : View
    {
        return view('access_tickets.table');
    }
}
