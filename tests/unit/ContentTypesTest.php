<?php

use App\Models\ContentModel;
use CodeIgniter\Test\CIUnitTestCase;

/** @internal */
final class ContentTypesTest extends CIUnitTestCase
{
    public function testAllLegacyContentTypesHavePostgresMappings(): void
    {
        $this->assertSame(
            ['program', 'startup', 'news', 'event', 'blog', 'gallery'],
            array_keys(ContentModel::TYPES),
        );

        foreach (ContentModel::TYPES as $type => $definition) {
            $this->assertStringStartsWith('tbl_', $definition['table']);
            $this->assertStringStartsWith('id_', $definition['id']);
            $this->assertStringStartsWith('judul_', $definition['title']);
            $this->assertFileExists(APPPATH . 'Views/legacy/front/' . $definition['view'] . '.php');
        }
    }
}
