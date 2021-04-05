class AppError extends ErrorHandler {
    function error404($params) {
        $this->controller->layout = 'LenderLayouts';
        parent::error404($params);
    }
}