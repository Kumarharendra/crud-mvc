<?php
namespace Lof\MarketPlace\Controller\Marketplace\Ajax;


class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_seller;
    protected $_session;
    protected $_customer;
    protected $_customerFactory;



    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Lof\MarketPlace\Model\SellerFactory $seller,
        \Magento\Customer\Model\Session $session,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\Customer $customers,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_seller = $seller;
        $this->_session = $session;
        $this->_customerFactory = $customerFactory;
        $this->_customer = $customers;
        return parent::__construct($context);
    }

    public function execute()
    {
       
      $data = $this->getRequest()->getParams();
          	  if(isset($data['addressval']) && $data['addressval']!=''){
          		  $city = $data['addressval'];
          			$city =$this->get_geocode($city);
          			echo json_encode($city);
              }
               $id = $this->_session->getCustomer()->getId();
                $collection = $this->_seller->create()->getCollection()->addFieldToFilter('customer_id',$id);
             
                    foreach ($collection->getData() as  $value) {
                     $model = $this->_seller->create()->load($value['seller_id']);
                     $model->setlatitude($city['latitude']); 
                     $model->setlongitude($city['longitude']);              
                     $data = $model->save();
                    
         
           }   
               }               

function get_geocode($address){

          $address = urlencode($address);
    
    // google map geocode api url
    $url = "https://maps.google.com/maps/api/geocode/json?address={$address}&key=AIzaSyB6TSaO1wacozgYzrV0TwauBTmOevQfNiM";
 
    // get the json response from url
    $resp_json = @file_get_contents($url);
    
    // decode the json response
    $resp = json_decode($resp_json, true);

    // response status will be 'OK', if able to geocode given address
    if($resp['status']=='OK'){
        //define empty array
        $data_arr = array(); 
        // get the important data
        $data_arr['latitude'] = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : '';
        $data_arr['longitude'] = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : '';
        $data_arr['formatted_address'] = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : '';
        
        // verify if data is exist
        if(!empty($data_arr) && !empty($data_arr['latitude']) && !empty($data_arr['longitude'])){

            return $data_arr;
            
        }else{
            return 2;
        }
        
    }
    else{
        return 3;
     }
}

  
    
}