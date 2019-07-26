<?php
/**
 * Lebed Customer Setup Install Data
 *
 * @category  Lebed
 * @package   Lebed\Customer
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Customer\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Customer\Model\Customer;

/**
 * Class InstallData
 *
 * @package Lebed\Customer\Setup
 */
class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Customer setup factory
     *
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * Attribute repository interface
     *
     * @var AttributeRepositoryInterface
     */
    private $attributeRepository;

    /**
     * Constructor InstallData
     *
     * @param EavSetupFactory              $eavSetupFactory
     * @param CustomerSetupFactory         $customerSetupFactory
     * @param AttributeRepositoryInterface $attributeRepository
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        CustomerSetupFactory $customerSetupFactory,
        AttributeRepositoryInterface $attributeRepository
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeRepository = $attributeRepository;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $this->attributeRepository->deleteById(156);
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'customer_company_lebed',
            [
                'type'           => 'text',
                'label'          => 'Company name Lebed label',
                'input'          => 'text',
                'required'       => 0,
                'visible'        => 1,
                'sort_order'     => 56,
                'position'       => 44,
                'source'         => '',
                'validate_rules' => '',
                'system'         => 0,
                'frontend_label' => 'Company name Lebed frontend label',
                'backend_model'  => ''
            ]
        );

        // show the attribute in the following forms
        $attribute = $customerSetup
            ->getEavConfig()
            ->getAttribute(
                Customer::ENTITY,
                'customer_company_lebed'
            )->addData(
                [
                    'used_in_forms' => [
                        'adminhtml_customer',
                        'adminhtml_checkout',
                        'customer_account_create',
                        'customer_account_edit'
                    ]
                ]
            );

        $this->attributeRepository->save($attribute);

        $setup->endSetup();
    }
}
