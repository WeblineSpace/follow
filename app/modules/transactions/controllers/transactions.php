<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set('display_errors', 1);
class transactions extends My_UserController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(get_class($this).'_model', 'main_model');

        $this->controller_name   = strtolower(get_class($this));
        $this->controller_title  = ucfirst(str_replace('_', ' ', get_class($this)));
        $this->path_views        = "";
        $this->params            = [];
        $this->columns     =  array(
            "id"         => ['name' => '#',                            'class' => 'text-center'],
            "type"       => ['name' => lang('Payment_method'),         'class' => 'text-center'],
            "amount"     => ['name' => lang("Amount_includes_fee"),    'class' => 'text-center'],
            "txn_fee"    => ['name' => lang("Transaction_fee"),        'class' => 'text-center'],
            "status"     => ['name' => lang("Status"),                 'class' => 'text-center'],
            "created"    => ['name' => lang("Created"),                'class' => 'text-center'],
        );
    }

    public function index()
    {
        $this->main_model->delete_unpaid_payment(7);
        $page        = (int)get("p");
        $page        = ($page > 0) ? ($page - 1) : 0;
        if (in_array($this->controller_name, ['orders', 'dripfeed', 'subscriptions'])) {
            $filter_status = (isset($_GET['status'])) ? get('status') : 'all';
        }else{
            $filter_status = (isset($_GET['status'])) ? (int)get('status') : '3';
        }
        $this->params = [
            'pagination' => [
                'limit'  => $this->limit_per_page,
                'start'  => $page * $this->limit_per_page,
            ],
            'filter' => ['status' => $filter_status],
            'search' => ['query'  => get('query'), 'field' => get('field')],
        ];

        $filter = [
            'user'              => get('user'),
            'transaction_id'    => get('transaction_id'),
            'payment_method'    => get('payment_method'),
            'amount'            => get('amount'),
            'transaction_fee'   => get('transaction_fee'),
            'note'              => get('note'),
            'created'           => get('created'),
            'status'            => get('status'),
        ];

        $items = $this->main_model->list_items($this->params, ['task' => 'list-items'], $filter);
        $items_status_count = $this->main_model->count_items($this->params, ['task' => 'count-items-group-by-status']);

        $this->db->select("*");
        $this->db->from(PAYMENTS_METHOD);
        $payments = $this->db->get();

        $data = array(
            "payments"            => $payments->result(),
            "filter"              => $filter,
            "controller_name"     => $this->controller_name,
            "params"              => $this->params,
            "columns"             => $this->columns,
            "items"               => $items,
            "items_status_count"  => $items_status_count,
            "from"                => $page * $this->limit_per_page,
            "pagination"          => create_pagination([
                'base_url'         => cn($this->controller_name),
                'per_page'         => $this->limit_per_page,
                'query_string'     => $_GET, //$_GET 
                'total_rows'       => $this->main_model->count_items($this->params, ['task' => 'count-items-for-pagination']),
            ]),
        );
        $this->template->build($this->path_views . 'index', $data);
    }
    
}