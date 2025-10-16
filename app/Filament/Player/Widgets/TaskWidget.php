<?php

namespace App\Filament\Player\Widgets;

use Filament\Widgets\TableWidget;
use Filament\Tables\Table;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskWidget extends TableWidget
{
    protected static ?string $model = Task::class;

    public function table(Table $table): Table
    {
        return $table
            ->query(function (): \Illuminate\Database\Eloquent\Builder {
                return Task::query()
                    ->where('assigned_to', Auth::id())
                    ->latest()
                    ->limit(3);
            })
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title'),
                \Filament\Tables\Columns\TextColumn::make('due_date')->date(),
                \Filament\Tables\Columns\TextColumn::make('status'),
            ]);
    }
}