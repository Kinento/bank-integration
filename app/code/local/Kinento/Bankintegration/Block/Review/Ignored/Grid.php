<?php
/**
 * Kinento Bank Integration
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @category   Kinento
 * @package    Kinento_Bankintegration
 * @copyright  Copyright (c) 2009-2015 Kinento
 * @license    MIT license
 *
 */


class Kinento_Bankintegration_Block_Review_Ignored_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

	public function __construct() {
		parent::__construct();

		$this->setId( 'bankintegrationGrid' );
		$this->_controller = 'bankintegration';
	}

	protected function _prepareCollection() {
		$model = Mage::getModel( 'bankintegration/bankintegration' );
		$collection = $model->getCollection();
		$collection->addFieldToFilter( 'status', 'neglected' );

		$this->setCollection( $collection );

		return parent::_prepareCollection();
	}



	protected function _prepareColumns() {


		$this->addColumn( 'date', array(
				'header'        => Mage::helper( 'bankintegration' )->__( 'Date' ),
				'align'         => 'right',
				'width'         => '50px',
				'filter_index'  => 'date',
				'index'         => 'date',
				'type'          => 'date',
				'filter'        => false,
			) );

		$this->addColumn( 'name', array(
				'header'        => Mage::helper( 'bankintegration' )->__( 'Name' ),
				'align'         => 'left',
				'width'         => '80px',
				'filter_index'  => 'name',
				'index'         => 'name',
				'type'          => 'text',
				'escape'        => true,
			) );

		$this->addColumn( 'account', array(
				'header'        => Mage::helper( 'bankintegration' )->__( 'Account' ),
				'align'         => 'left',
				'width'         => '50px',
				'filter_index'  => 'account',
				'index'         => 'account',
				'type'          => 'text',
				'escape'        => true,
			) );

		$this->addColumn( 'amount', array(
				'header'        => Mage::helper( 'bankintegration' )->__( 'Amount' ),
				'align'         => 'left',
				'width'         => '50px',
				'filter_index'  => 'amount',
				'index'         => 'amount',
				'type'          => 'currency',
				'currency_code' => (string) Mage::getStoreConfig( Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE ),
				'escape'        => true,
			) );

		$this->addColumn( 'type', array(
				'header'        => Mage::helper( 'bankintegration' )->__( 'Type (1)' ),
				'align'         => 'left',
				'width'         => '30px',
				'filter_index'  => 'type',
				'index'         => 'type',
				'type'          => 'text',
				'escape'        => true,
			) );

		$this->addColumn( 'mutation', array(
				'header'        => Mage::helper( 'bankintegration' )->__( 'Type (2)' ),
				'align'         => 'left',
				'width'         => '50px',
				'filter_index'  => 'mutation',
				'index'         => 'mutation',
				'type'          => 'text',
				'escape'        => true,
			) );

		$this->addColumn( 'remarks', array(
				'header'        => Mage::helper( 'bankintegration' )->__( 'Remarks' ),
				'align'         => 'left',
				'width'         => '150px',
				'filter_index'  => 'remarks',
				'index'         => 'remarks',
				'type'          => 'text',
				'escape'        => true,
			) );
		$this->addColumn( 'accept', array(
				'header'        => Mage::helper( 'bankintegration' )->__( 'Accept entry' ),
				'width'         => '50px',
				'type'          => 'action',
				'getter'        => 'getEntryId',
				'actions'       => array(
					array(
						'caption'   => Mage::helper( 'bankintegration' )->__( 'Accept' ),
						'url'       => array(
							'base'    =>'*/*/change/status/unbound/url/ignored',
						),
						'field'     => 'id'
					)
				),
				'filter'        => false,
				'sortable'      => false
			) );


		return parent::_prepareColumns();
	}

	protected function _prepareMassaction() {
		$this->setMassactionIdField( 'entity_id' );
		$this->getMassactionBlock()->setFormFieldName( 'bankintegration' );

		$this->getMassactionBlock()->addItem( 'exportsel', array(
				'label'    => Mage::helper( 'bankintegration' )->__( 'Export selected entries' ),
				'url'      => $this->getUrl( '*/*/exportsel' )
			) );


		return $this;
	}

}
?>
