<?php

/**
 * Description of Grid
 *
 * @author Ea Design
 */
class EaDesign_PdfGenerator_Block_Adminhtml_Template_Pdf_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /*
     * set the default values for the grid system
     */

    protected function _construct()
    {
        $this->setEmptyText(Mage::helper('pdfgenerator')->__('No PDF Templates Found'));
        $this->setId('pdfGeneratorTemplates');
        $this->setUseAjax(false);
        $this->setSaveParametersInSession(true);
    }

    /*
     * We set the collection to use
     */

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceSingleton('eadesign/pdfgenerator_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /*
     * Add the columns in the grid view
     */

    protected function _prepareColumns()
    {
        $this->addColumn('pdftemplate_id', array(
                'header' => Mage::helper('pdfgenerator')->__('ID'),
                'index' => 'pdftemplate_id',
                'width' => '10px'
            )
        );

        $this->addColumn('pdftemplate_name', array(
            'header' => Mage::helper('pdfgenerator')->__('Template Name'),
            'index' => 'pdftemplate_name'
        ));

        $this->addColumn('pdft_is_active', array(
            'header' => Mage::helper('pdfgenerator')->__('Status'),
            'align' => 'left',
            'index' => 'pdft_is_active',
            'type' => 'options',
            'options' => Mage::getSingleton('eadesign/pdfgenerator')->getAvailableStatuses()
        ));


        $this->addColumn('pdft_attribute_set', array(
            'header' => Mage::helper('pdfgenerator')->__('Attribute set'),
            'align' => 'left',
            'index' => 'pdft_attribute_set',
            'type' => 'options',
            'options' => Mage::getSingleton('eadesign/pdfgenerator')->getAttributeSets()
        ));

        $this->addColumn('pdft_type', array(
            'header' => Mage::helper('pdfgenerator')->__('Type'),
            'align' => 'left',
            'index' => 'pdft_type',
            'type' => 'options',
            'options' => array(
                EaDesign_PdfGenerator_Model_Pdfgenerator::ORDERTEMPLATE => Mage::helper('pdfgenerator')->__('Order Template'),
                EaDesign_PdfGenerator_Model_Pdfgenerator::INVOICETEMPLATE => Mage::helper('pdfgenerator')->__('Invoice Template'),
                EaDesign_PdfGenerator_Model_Pdfgenerator::PRODUCTTEMPLATE => Mage::helper('pdfgenerator')->__('Product Template'),
                EaDesign_PdfGenerator_Model_Pdfgenerator::CMEMOTEMPLATE => Mage::helper('pdfgenerator')->__('Credit Memo Template'),
                EaDesign_PdfGenerator_Model_Pdfgenerator::SHIPPMENTTEMPLATE => Mage::helper('pdfgenerator')->__('Shiping Template'),
            )
        ));
        if (!Mage::app()->isSingleStoreMode()) {
            $this->addColumn('template_store_id', array(
                'header' => Mage::helper('pdfgenerator')->__('Store View'),
                'index' => 'template_store_id',
                'type' => 'store',
                'store_all' => false,
                'store_view' => false,
                'sortable' => false,
            ));
        }

        $this->addColumn('created_time', array(
            'header' => Mage::helper('pdfgenerator')->__('Created Time'),
            'align' => 'left',
            'index' => 'created_time',
            'type' => 'date',
        ));
        $this->addColumn('update_time', array(
            'header' => Mage::helper('pdfgenerator')->__('Updated Time'),
            'align' => 'left',
            'index' => 'update_time',
            'type' => 'date',
        ));

        return $this;
    }

    /*
     * We get the row to get action to edit the current id of the template
     */

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/editpdf', array('id' => $row->getId()));
    }

}