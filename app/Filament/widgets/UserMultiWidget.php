<?php
// app/Filament/Widgets/UserMultiWidget.php
use Kenepa\MultiWidget\MultiWidget;
class UserMultiWidget extends MultiWidget
{
    public array $widgets = [
        TotalScreens::class,
        DepartmentsCount::class,
        ActiveMediaFiles::class,
        EmptyWidget::class,
        ScreensPerDepartment::class,
        MediaUsageGraph::class, 
    ];
}