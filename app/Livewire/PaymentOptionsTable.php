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
use App\Models\PaymentOption;

class PaymentOptionsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $newModel = new PaymentOption();
        return $table
            ->query(PaymentOption::query())
            ->columns([
                TextColumn::make("entity_id")
                ->label($newModel->getAttributeLabel("entity_id"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("business_entity_name")
                ->label($newModel->getAttributeLabel("business_entity_name"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("vat")
                ->label($newModel->getAttributeLabel("vat"))
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
            TextColumn::make("email")
                ->label($newModel->getAttributeLabel("email"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("data")
                ->label($newModel->getAttributeLabel("data"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("currency")
                ->label($newModel->getAttributeLabel("currency"))
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
                ->url(fn (PaymentOption $record): string => route('payment-options.edit', ['payment_options' => $record]))
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
                fn (Model $record): string => route('payment-options.show', ['payment_options' => $record]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->defaultPaginationPageOption(25);
    }

    public function render() : View
    {
        return view('payment_options.table');
    }
}
