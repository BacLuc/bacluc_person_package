<?php
/**
 * Created by PhpStorm.
 * User: lucius
 * Date: 21.10.16
 * Time: 12:34
 */

namespace Concrete\Package\BaclucPersonPackage\Src\EntityViews;


use Concrete\Package\BasicTablePackage\Src\AbstractFormView;

class PostalAddressFormView extends AbstractFormView
{
    /**
     * @param $form
     * @param $clientSideValidationActivated
     * @return mixed
     */
    public function getFormView ($form, $clientSideValidationActivated = true)
    {
        $variables = $this->getFilledVariables($clientSideValidationActivated);


        $html = "
        <div class='row'>
            " . $variables['id']['input'] . "
            <div class='row'>
                <div class = 'col-xs-12 col-sm-6'>
                    <div class='row'>
                        <div class='col-sm-12 col-md-2'>
                            <label>" . $variables['type']['label'] . "</label>
                        </div>
                        <div class='col-sm-12 col-md-10'>
                            " . $variables['type']['input'] . "
                        </div>
                    </div>
                </div>
                <div class = 'col-xs-12 col-sm-6'>
                    <div class='row'>
                        <div class='col-sm-12 col-md-2'>
                            <label>" . $variables['organisation']['label'] . "</label>
                        </div>
                        <div class='col-sm-12 col-md-10'>
                            " . $variables['organisation']['input'] . "
                        </div>
                    </div>
                </div>
            </div>
            
            <div class='row'>
                            <div class = 'col-xs-12 col-sm-6'>
                                <div class='row'>
                                    <div class='col-sm-12 col-md-2'>
                                        <label>" . $variables['info']['label'] . "</label>
                                    </div>
                                    <div class='col-sm-12 col-md-10'>
                                        " . $variables['info']['input'] . "
                                    </div>
                                </div>
                            </div>
                            
             </div>
             <div class='row'>
                            <div class = 'col-xs-12'>
                                <div class='row'>
                                    <div class='col-sm-12 col-md-1'>
                                        <label>" . $variables['address']['label'] . "</label>
                                    </div>
                                    <div class='col-sm-12 col-md-11'>
                                        " . $variables['address']['input'] . "
                                    </div>
                                </div>
                            </div>
                            
             </div>
             
             <div class='row'>
                                         <div class = 'col-xs-12'>
                                             <div class='row'>
                                                 <div class='col-sm-12 col-md-1'>
                                                     <label>" . $variables['additionalinfo']['label'] . "</label>
                                                 </div>
                                                 <div class='col-sm-12 col-md-11'>
                                                     " . $variables['additionalinfo']['input'] . "
                                                 </div>
                                             </div>
                                         </div>
                                         
                </div>
                          
               <div class='row'>
                               <div class = 'col-xs-12 col-sm-4'>
                                   <div class='row'>
                                       <div class='col-sm-12 col-md-3 '>
                                           <label>" . $variables['floor']['label'] . "</label>
                                       </div>
                                       <div class='col-sm-12 col-md-9 '>
                                           " . $variables['floor']['input'] . "
                                       </div>
                                   </div>
                               </div>
                               <div class = 'col-xs-12 col-sm-4'>
                                   <div class='row'>
                                       <div class='col-sm-12 col-md-3 '>
                                           <label>" . $variables['postalcode']['label'] . "</label>
                                       </div>
                                       <div class='col-sm-12 col-md-9 '>
                                           " . $variables['postalcode']['input'] . "
                                       </div>
                                   </div>
                               </div>
                               <div class = 'col-xs-12 col-sm-4'>
                                   <div class='row'>
                                       <div class='col-sm-12 col-md-3 '>
                                           <label>" . $variables['city']['label'] . "</label>
                                       </div>
                                       <div class='col-sm-12 col-md-9 '>
                                           " . $variables['city']['input'] . "
                                       </div>
                                   </div>
                               </div>
              </div>
              <div class='row'>
                              <div class = 'col-xs-12 col-sm-6'>
                                  <div class='row'>
                                      <div class='col-sm-12 col-md-2 '>
                                          <label>" . $variables['state']['label'] . "</label>
                                      </div>
                                      <div class='col-sm-12 col-md-10 '>
                                          " . $variables['state']['input'] . "
                                      </div>
                                  </div>
                              </div>
                              <div class = 'col-xs-12 col-sm-6'>
                                  <div class='row'>
                                      <div class='col-sm-12 col-md-2'>
                                          <label>" . $variables['country']['label'] . "</label>
                                      </div>
                                      <div class='col-sm-12 col-md-10'>
                                          " . $variables['country']['input'] . "
                                      </div>
                                  </div>
                              </div>
               </div>
               
            
        </div>
        
        ";
        return $html;
    }
}