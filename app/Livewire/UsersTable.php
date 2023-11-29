<?php

namespace App\Livewire;

use App\Models\Role;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
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
use App\Models\User;

class UsersTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function table(Table $table): Table
    {
        $newModel = new User();
        return $table
            ->query(User::query()->with('roles'))
            ->columns([
                TextColumn::make("name")
                    ->label($newModel->getAttributeLabel("name"))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make("person")
                    ->label($newModel->getAttributeLabel("person"))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make("email")
                    ->label($newModel->getAttributeLabel("email"))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make("brand")
                    ->label($newModel->getAttributeLabel("brand"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("nif")
                    ->label($newModel->getAttributeLabel("nif"))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make("nif_type")
                    ->label($newModel->getAttributeLabel("nif_type"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("address")
                    ->label($newModel->getAttributeLabel("address"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("zip")
                    ->label($newModel->getAttributeLabel("zip"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("local")
                    ->label($newModel->getAttributeLabel("local"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("country")
                    ->label($newModel->getAttributeLabel("country"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("phone")
                    ->label($newModel->getAttributeLabel("phone"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("website")
                    ->label($newModel->getAttributeLabel("website"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("nic")
                    ->label($newModel->getAttributeLabel("nic"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("nic_type")
                    ->label($newModel->getAttributeLabel("nic_type"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("birthday")
                    ->label($newModel->getAttributeLabel("birthday"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make("rd_1")
                    ->label($newModel->getAttributeLabel("rd_1"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_2")
                    ->label($newModel->getAttributeLabel("rd_2"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_3")
                    ->label($newModel->getAttributeLabel("rd_3"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_4")
                    ->label($newModel->getAttributeLabel("rd_4"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_5")
                    ->label($newModel->getAttributeLabel("rd_5"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_6")
                    ->label($newModel->getAttributeLabel("rd_6"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_7")
                    ->label($newModel->getAttributeLabel("rd_7"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_8")
                    ->label($newModel->getAttributeLabel("rd_8"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_9")
                    ->label($newModel->getAttributeLabel("rd_9"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_10")
                    ->label($newModel->getAttributeLabel("rd_10"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("rd_11")
                    ->label($newModel->getAttributeLabel("rd_11"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fr_1")
                    ->label($newModel->getAttributeLabel("fr_1"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fr_2")
                    ->label($newModel->getAttributeLabel("fr_2"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fr_3")
                    ->label($newModel->getAttributeLabel("fr_3"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fr_4")
                    ->label($newModel->getAttributeLabel("fr_4"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fr_5")
                    ->label($newModel->getAttributeLabel("fr_5"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fr_6")
                    ->label($newModel->getAttributeLabel("fr_6"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fr_7")
                    ->label($newModel->getAttributeLabel("fr_7"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fv_1")
                    ->label($newModel->getAttributeLabel("fv_1"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fv_2")
                    ->label($newModel->getAttributeLabel("fv_2"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fv_3")
                    ->label($newModel->getAttributeLabel("fv_3"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fv_4")
                    ->label($newModel->getAttributeLabel("fv_4"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("fv_5")
                    ->label($newModel->getAttributeLabel("fv_5"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mm_1")
                    ->label($newModel->getAttributeLabel("mm_1"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mm_2")
                    ->label($newModel->getAttributeLabel("mm_2"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mm_3")
                    ->label($newModel->getAttributeLabel("mm_3"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mm_4")
                    ->label($newModel->getAttributeLabel("mm_4"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mm_5")
                    ->label($newModel->getAttributeLabel("mm_5"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mm_6")
                    ->label($newModel->getAttributeLabel("mm_6"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mm_7")
                    ->label($newModel->getAttributeLabel("mm_7"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mm_8")
                    ->label($newModel->getAttributeLabel("mm_8"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mr_1")
                    ->label($newModel->getAttributeLabel("mr_1"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mr_2")
                    ->label($newModel->getAttributeLabel("mr_2"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mr_3")
                    ->label($newModel->getAttributeLabel("mr_3"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mr_4")
                    ->label($newModel->getAttributeLabel("mr_4"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mr_5")
                    ->label($newModel->getAttributeLabel("mr_5"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("mr_6")
                    ->label($newModel->getAttributeLabel("mr_6"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("pt_1")
                    ->label($newModel->getAttributeLabel("pt_1"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("pt_2")
                    ->label($newModel->getAttributeLabel("pt_2"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("pt_3")
                    ->label($newModel->getAttributeLabel("pt_3"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("lang")
                    ->label($newModel->getAttributeLabel("lang"))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                /*TextColumn::make("email_verified_at")
                    ->label($newModel->getAttributeLabel("email_verified_at"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),*/
                /*TextColumn::make("profile_photo_path")
                    ->label($newModel->getAttributeLabel("profile_photo_path"))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),*/
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
                TextColumn::make('roles.name')
                    ->label($newModel->getAttributeLabel('roles'))
                    ->toggleable(),
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
                SelectFilter::make('roles')
                    ->label($newModel->getAttributeLabel('roles'))
                    ->options(Role::pluck('name', 'id')->toArray())
                    ->modifyQueryUsing(function (Builder $query, $state) {
                        if (empty($state['value'])) {
                            return $query;
                        }
                        return $query->whereHas('roles', fn($query) => $query->where('id', $state['value']));
                    }),
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

                //->color('danger')
                ActionGroup::make([
                    Action::make('view')
                        ->label(__('View'))
                        ->url(fn (User $record): string => route('users.show', ['user' => $record]))
                        ->icon('heroicon-o-eye'),
                    Action::make('edit')
                        ->label(__('Update'))
                        ->url(fn (User $record): string => route('users.edit', ['user' => $record]))
                        ->icon('heroicon-o-pencil'),
                    Action::make('impersonate')
                        ->label(__('Impersonate'))
                        ->url(fn (User $record): string => route('impersonate', $record->id))
                        //->action(fn (User $record): bool => auth()->user()->impersonate($record, 'web'))
                        ->icon('heroicon-o-users')
                        ->visible(fn (User $record): bool => auth()->user()->id != $record->id && (auth()->user()->can('adminFullApp'))),
                        //->authorize(fn (User $record): bool => auth()->user()->id != $record->id && (auth()->user()->can('adminFullApp'))),
                    DeleteAction::make()
                ])->iconButton()
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
                fn (Model $record): string => route('users.edit', ['user' => $record]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->defaultPaginationPageOption(25);
    }

    public function render() : View
    {
        return view('users.table');
    }
}
